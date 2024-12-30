import { Input } from "components/ui";
import { useRef } from "react";
import { HiOutlineSearch } from "react-icons/hi";
import { debounce } from "lodash";
import useThemeClass from "utils/hooks/useThemeClass"

export const TableSearch = (props) => {
  const searchInput = useRef()
  const debounceFn = debounce(handleDebounceFn, 500)
  const { bgTheme } = useThemeClass()

  function handleDebounceFn(val) {
    if (typeof val === "string" && val.length > 1) {
      props.getData({ ...props.localState.params, page: 1, q: val })
    }

    if (typeof val === "string" && val.length === 0) {
      props.getData({ ...props.localState.params, page: 1, q: val })
    }
  }

  const onEdit = (e) => {
    debounceFn(e.target.value)
  }

  return (
    <Input
      search
      ref={searchInput}
      defaultValue={props.query ? props.query : ""}
      className=" lg:w-52 lg:mb-0 mb-4 mr-2"
      size="md"
      placeholder="Search..."
      suffix={<HiOutlineSearch color={bgTheme} className="text-lg" />}
      onChange={onEdit}
    />
  )
}
