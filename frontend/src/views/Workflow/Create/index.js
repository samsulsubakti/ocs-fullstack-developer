import { AdaptableCard } from "components/shared";
import { PageConfig } from "../config";
import { FormData } from "./form";
const Page = () => {
  return (
    <>
      <AdaptableCard className="h-full" bodyClass="h-full p-2">
        <div className="mb-[20px]">
          <h3 className="text-zinc-800 text-2xl font-bold mt-[12px] px-5 py-1">
            {PageConfig.moduleTitle} &raquo; {PageConfig.pageTitle}
          </h3>
          <hr></hr>
          <div className="px-5 my-[12px] mt-6 mb-6">
            <FormData />
          </div>
          <hr></hr>
        </div>
      </AdaptableCard>
    </>
  );
};

export default Page;
