import React from "react";
import SignInForm from "./SignInForm";
import Simple from "components/layout/AuthLayout/Simple";

const SignIn = () => {
  return (
    <Simple
      content={
        <div className="mb-4">
          <h3 className="mb-1">Welcome back!</h3>
          <p>Please enter your credentials to sign in!</p>
          <div style={{ height: 20 }}></div>
        </div>
      }
    >
      {/* <div className="mb-8 ">
        <h3 className="mb-1">Welcome back!</h3>
        <p>Please enter your credentials to sign in!</p>
      </div> */}
      <SignInForm disableSubmit={false} />
    </Simple>
  );
};

export default SignIn;
