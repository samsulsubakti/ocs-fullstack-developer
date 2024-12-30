import React, { useEffect, useState } from "react";
import { Formik, Field, Form, ErrorMessage } from "formik";
import * as Yup from "yup";
import { Button, Input, Notification, toast } from "components/ui";
import { useNavigate, useParams } from "react-router-dom";
import { apiShow, apiStore, apiUpdate } from "../api";
import { apiIndex } from "views/Workflow/api";

export const FormData = () => {
  const navigate = useNavigate();

  const { id } = useParams();

  const [initialValues, setInitialValues] = useState({
    modul_id: "",
    amount: "",
  });
  const [workflow, setWorkflow] = useState([]);
  const is_create = id ? false : true;

  const validationSchema = Yup.object({
    modul_id: Yup.string().required("Modul wajib diisi"),
    amount: Yup.string().required("Amount wajib dipilih"),
  });

  const fetchWorkflowApproval = async () => {
    const api = await apiIndex({});
    const ress = api.data.data;
    let newElement = {
      id: "",
      modul: "Silahkan Pilih",
      type: "Modul",
    };
    ress.unshift(newElement);
    setWorkflow(ress);
  };

  useEffect(() => {
    const fetchData = async () => {
      if (!is_create) {
        const api = await apiShow(id);
        const ress = api.data.data;
        setInitialValues({
          modul_id: ress.modul_id,
          amount: ress.amount,
        });
      }
    };

    fetchData();
    fetchWorkflowApproval();
  }, [id, is_create]);

  return (
    <div>
      <Formik
        initialValues={initialValues}
        validationSchema={validationSchema}
        enableReinitialize={true}
        onSubmit={async (values, { setSubmitting, setErrors }) => {
          setSubmitting(true);
          
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
              <label htmlFor="type">Modul</label>
              <Field
                as="select"
                id="modul"
                name="modul_id"
                onChange={(e) => {
                  const value = e.target.value;
                  setFieldValue("modul_id", value);
                }}
                className="border border-solid border-gray-300 rounded-[5px] h-[40px]"
              >
                {workflow.map((dt, k) => (
                  <option key={k} value={dt?.id}>
                    {dt?.modul + " - " + dt?.type}
                  </option>
                ))}
              </Field>
              <ErrorMessage
                name="modul_id"
                component="div"
                className="text-red-400"
              />
            </div>

            <div className="lg:grid grid-cols-1 gap-2 mb-4">
              <label htmlFor="value">Amount</label>
              <Field
                type="number"
                id="amount"
                name="amount"
                component={Input}
                placeholder="Masukkan Value"
              />
              <ErrorMessage
                name="amount"
                component="div"
                className="text-red-400"
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
