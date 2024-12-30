import React from "react";

export const ROUTE_LIST = [
  {
    key: "nav.gen.Base.Users",
    path: "/base/users",
    component: React.lazy(() => import("views/BaseUsers")),
    authority: [],
  },
  {
    key: "nav.gen.Base.employee",
    path: "/base/employee",
    component: React.lazy(() => import("views/Employee")),
    authority: [],
  },
  {
    key: "nav.approval.transaction",
    path: "/approval/transaction",
    component: React.lazy(() => import("views/Transaction")),
    authority: [],
  },
  {
    key: "nav.approval.transaction",
    path: "/approval/transaction/create",
    component: React.lazy(() => import("views/Transaction/Create")),
    authority: [],
  },
  {
    key: "nav.approval.transaction",
    path: "/approval/transaction/edit/:id",
    component: React.lazy(() => import("views/Transaction/Create")),
    authority: [],
  },
  {
    key: "nav.approval.workflow",
    path: "/approval/workflow",
    component: React.lazy(() => import("views/Workflow")),
    authority: [],
  },
  {
    key: "nav.approval.workflow",
    path: "/approval/workflow/create",
    component: React.lazy(() => import("views/Workflow/Create")),
    authority: [],
  },
  {
    key: "nav.approval.workflow",
    path: "/approval/workflow/edit/:id",
    component: React.lazy(() => import("views/Workflow/Create")),
    authority: [],
  },
  {
    key: "nav.approval.need_approval",
    path: "/approval/need-approval",
    component: React.lazy(() => import("views/NeedApproval")),
    authority: [],
  },
];
