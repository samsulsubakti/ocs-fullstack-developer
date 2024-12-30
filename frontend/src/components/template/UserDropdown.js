import React, { useState } from "react"
import { Avatar, Dropdown } from "components/ui"
import withHeaderItem from "utils/hoc/withHeaderItem"
import useAuth from "utils/hooks/useAuth"
// import { useSelector } from 'react-redux'
// import { Link } from "react-router-dom";
import classNames from "classnames"
import { HiOutlineUser, HiOutlineUserGroup } from "react-icons/hi"
import { FiLogOut } from "react-icons/fi"
import appConfig from "configs/app.config"
import { VscKey } from "react-icons/vsc"
import SettingsModal from "components/custom/ModalSettings"
// import { VscSettingsGear } from "react-icons/vsc";

export const UserDropdown = ({ className }) => {
  const [isModalOpen, setIsModalOpen] = useState(false)
  const { hrisNavigate } = appConfig
  // bind this
  // const userInfo = useSelector((state) => state.auth.user)

  const { signOut, user } = useAuth()

  const handleSettingsClick = () => {
    setIsModalOpen(true)
  }

  const dropdownItemList = [
    {
      label: "Change Password",
      icon: <VscKey />,
      onClick: handleSettingsClick,
    },
  ]

  const UserAvatar = (
    <div className={classNames(className, "flex items-center")}>
      <Avatar size={32} shape="circle" icon={<HiOutlineUser />} className="mr-2" />
      <div className="hidden md:block">
        <div className="text-xs capitalize">{user?.name}</div>
        <div className="font-bold">{user?.email}</div>
      </div>
    </div>
  )

  return (
    <div>
      <Dropdown
        menuStyle={{ minWidth: 205, marginTop: "20%", marginRight: "20px" }}
        renderTitle={UserAvatar}
        placement="bottom-start"
      >
        <Dropdown.Item
          onClick={signOut}
          eventKey="Sign Out"
          className="gap-2 flex justify-between items-center !text-[#DA2A27]"
        >
          <span>Log Out</span>
          <span className="text-lg">
            <FiLogOut />
          </span>
        </Dropdown.Item>
      </Dropdown>
      <SettingsModal
        isOpen={isModalOpen}
        onClose={() => setIsModalOpen(false)}
      />
    </div>
  )
}

export default withHeaderItem(UserDropdown)
