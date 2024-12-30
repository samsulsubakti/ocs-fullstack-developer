import React, { useCallback, useEffect, useState } from "react";
import { Formik, Field, Form, ErrorMessage } from "formik";
import * as Yup from "yup";
import { Button, Input, Notification, toast } from "components/ui";
import { apiShow as employeeDetail } from "../../Employee/api";
import { useNavigate, useParams } from "react-router-dom";
import { apiShow, apiStore, apiUpdate } from "../api";

export const FormData = () => {
  const navigate = useNavigate();
  const [employeeData, setEmployeeData] = useState(null);

  const { id } = useParams();

  const is_create = id ? false : true;

  const validationSchema = Yup.object({
    modul: Yup.string().required("Nama Modul wajib diisi"),
    type: Yup.string().required("Type wajib dipilih"),
    value: Yup.number().when("type", {
      is: (type) => type !== "Custom",
      then: Yup.number().required("Value wajib diisi jika Type bukan Custom"),
      otherwise: Yup.number().notRequired(),
    }),
    nik: Yup.string().when("type", {
      is: (type) => type !== "HRIS",
      then: Yup.string().required("NIK wajib diisi jika Type bukan HRIS"),
      otherwise: Yup.string().notRequired(),
    }),
  });

  const checkNIK = async (value, setFieldValue) => {
    if (value.length === 16) {
      try {
        const ress = await employeeDetail(value, []);
        setEmployeeData(ress.data);
        setFieldValue("name", ress?.data?.data?.name);
        setFieldValue("email", ress?.data?.data?.email);
        setFieldValue("position", ress?.data?.data?.position);
      } catch (error) {
        setEmployeeData(null);
      }
    }
  };

  const [initialValues, setInitialValues] = useState({
    modul: "",
    type: "",
    value: "",
    nik: "",
    name: "",
    email: "",
    position: "",
  });

  useEffect(() => {
    const fetchData = async () => {
      if (!is_create) {
        const api = await apiShow(id);
        const ress = api.data;
        setInitialValues({
          modul: ress?.data?.modul,
          type: ress?.data?.type,
          value: ress?.data?.value,
          nik: ress?.data?.nik,
          name: ress?.data?.name,
          email: ress?.data?.email,
          position: ress?.data?.position,
        });
      } 
    };

    fetchData();
  }, [id, is_create]);


  return (
    <div>
      <Formik
        initialValues={initialValues}
        validationSchema={validationSchema}
        enableReinitialize={true}
        onSubmit={async (values, { setSubmitting, setErrors }) => {
          setSubmitting(true);
          // console.log(values, employeeData);
          // return;
          try {
            if (!is_create) {
              await apiUpdate(id, values);
            } else {
              await apiStore(values);
            }

            toast.push(
              <Notification
                title={"Successfuly " + values.modul}
                type="success"
                duration={2500}
              >
                Data successfuly {values.modul}
              </Notification>,
              {
                placement: "top-center",
              }
            );
            navigate(-1);
          } catch (error) {
            if (error?.response?.data?.errors) {
              const beEr = error?.response?.data?.errors;
              setErrors(beEr);
            }

            toast.push(
              <Notification title={"Error"} type="danger">
                {error?.response?.data?.message ||
                  error?.message ||
                  "Something went wrong"}
              </Notification>,
              {
                placement: "top-center",
              }
            );
          }
          setSubmitting(false);
        }}
      >
        {({ setFieldValue, values, errors, isSubmitting }) => (
          <Form className="gap-4">
            <div className="lg:grid grid-cols-1 gap-2 mb-4">
              <label htmlFor="modul">Nama Modul</label>
              <Field
                type="text"
                id="modul"
                name="modul"
                component={Input}
                placeholder="Masukkan Nama Modul"
              />
              <ErrorMessage
                name="modul"
                component="div"
                className="text-red-400"
              />
            </div>

            <div className="lg:grid grid-cols-1 gap-2 mb-4">
              <label htmlFor="type">Type</label>
              <Field
                as="select"
                id="type"
                name="type"
                className="border border-solid border-gray-300 rounded-[5px] h-[40px]"
              >
                <option value="">Pilih Type</option>
                <option value="Custom">Custom</option>
                <option value="HRIS">HRIS</option>
                <option value="Total Amount >=">Total Amount &#10217;= </option>
                <option value="Total Amount >">Total Amount &#10217; </option>
                <option value="Total Amount <=">Total Amount &#10216;= </option>
                <option value="Total Amount <">Total Amount &#10216; </option>
              </Field>
              <ErrorMessage
                name="type"
                component="div"
                className="text-red-400"
              />
            </div>

            <div className="lg:grid grid-cols-1 gap-2 mb-4">
              <label htmlFor="value">Value</label>
              <Field
                type="number"
                id="value"
                name="value"
                component={Input}
                placeholder="Masukkan Value"
              />
              <ErrorMessage
                name="value"
                component="div"
                className="text-red-400"
              />
            </div>

            <div className="lg:grid grid-cols-4 gap-2 mb-4">
              <label htmlFor="nik">NIK</label>
              <Button
                type="button"
                className="col-span-1"
                onClick={() => {
                  if (values.nik.length === 16) {
                    checkNIK(values.nik, setFieldValue);
                  }
                }}
              >
                Check
              </Button>
              <Field
                type="text"
                id="nik"
                name="nik"
                component={Input}
                className="col-span-2"
                // onChange={(e) => {
                //   const value = e.target.value;
                //   if(value.length === 16) {
                //     // checkNIK(value); // Check NIK asynchronously
                //     setFieldValue("nik", value);
                //     // setFieldValue("name", employeeData?.data?.name);
                //     // setFieldValue("email", employeeData?.data?.email);
                //     // setFieldValue("position", employeeData?.data?.position);
                //   } else {
                //     setFieldValue("nik", value);
                //     setFieldValue("name", null);
                //     setFieldValue("email", null);
                //     setFieldValue("position", null);
                //   }
                // }}
                value={values.nik} // Bind the Formik value to the input field
                placeholder="Masukkan NIK"
              />
              <ErrorMessage
                name="nik"
                component="div"
                className="text-red-400"
              />
            </div>

            <div className="lg:grid grid-cols-2 gap-2 mb-4">
              <label htmlFor="modul">Employee Name</label>
              <Field
                type="text"
                id="name_emoloyee"
                name="name"
                component={Input}
                disabled={true}
                value={employeeData?.data?.name ?? null}
              />
              <label htmlFor="modul">Employee Email</label>
              <Field
                type="text"
                id="name_emoloyee"
                name="email"
                component={Input}
                disabled={true}
                value={employeeData?.data?.email ?? null}
              />
              <label htmlFor="modul">Employee Position</label>
              <Field
                type="text"
                id="name_emoloyee"
                name="position"
                component={Input}
                disabled={true}
                value={employeeData?.data?.position ?? null}
              />
            </div>

            <div className="lg:grid grid-cols-1 gap-2 mb-4 mt-5">
              <Button
                variant="solid"
                className="min-w-[250px]"
                type="submit"
                loading={isSubmitting}
              >
                {isSubmitting ? "Loading..." : "Save"}
              </Button>
              <Button
                variant="default"
                onClick={() => {
                  navigate(-1);
                }}
                className="!bg-transparent !rounded-lg !px-5 min-w-[120px] font-bold"
                type="button"
              >
                Cancel
              </Button>
            </div>
          </Form>
        )}
      </Formik>
    </div>
  );
};
