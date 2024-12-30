import { Button } from "components/ui";
import { PageConfig } from "./config";

export const Details = ({ item, onDialogClose }) => {
  return (
    <>
      <div className="p-6">
        <h5 className="mb-4 text-center">Details</h5>

        {PageConfig.formFields.map((i) => {
          return (
            <div class="flex flex-row mb-3" key={i.key}>
              <div class="basis-1/4">{i.label}</div>
              <div class="basis-3/4">{item[i.key] ?? ""}</div>
            </div>
          );
        })}

        <hr className="p-2"></hr>

        <div class="flex flex-row mb-3">
          <div class="basis-1/4">Module Name</div>
          <div class="basis-3/4">{item?.workflowApproval?.modul ?? ""}</div>
        </div>
        <div class="flex flex-row mb-3">
          <div class="basis-1/4">Module Type</div>
          <div class="basis-3/4">{item?.workflowApproval?.type ?? ""}</div>
        </div>
        <div class="flex flex-row mb-3">
          <div class="basis-1/4">Module Value</div>
          <div class="basis-3/4">{item?.workflowApproval?.value ?? ""}</div>
        </div>
        <div class="flex flex-row mb-3">
          <div class="basis-1/4">Approval NIK</div>
          <div class="basis-3/4">{item?.workflowApproval?.nik ?? ""}</div>
        </div>

        <div class="flex flex-row mb-3">
          <div class="basis-1/4">Approval Name</div>
          <div class="basis-3/4">{item?.workflowApproval?.name ?? ""}</div>
        </div>


        <div className="text-center mt-6">
          <Button
            className=" min-w-[250px] "
            type="button"
            onClick={onDialogClose}
          >
            Close
          </Button>
        </div>
      </div>
    </>
  );
};
