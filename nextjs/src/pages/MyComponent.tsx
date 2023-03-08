import React, {useEffect, useState} from "react";
import {
  LOGIN_STATE_ERRORED,
  LOGIN_STATE_LOADING,
  LOGIN_STATE_LOGGED_IN,
  LOGIN_STATE_LOGGED_OUT,
  WHO_AM_I_PATH
} from "@/config";

export const MyComponent = () => {

  const [whoami, setWhoAmi] = useState({})
  const [loginState, setLoginState] = useState(LOGIN_STATE_LOADING)

  useEffect(() => {
    fetch(WHO_AM_I_PATH).then(response => {
      if (response.status === 200) {
        setLoginState(LOGIN_STATE_LOGGED_IN)
        response.json().then(json => setWhoAmi(json))
      } else if (response.status === 401) {
        setLoginState(LOGIN_STATE_LOGGED_OUT)
      } else {
        setLoginState(LOGIN_STATE_ERRORED)
      }
    })
  }, [whoami])

  if (loginState === LOGIN_STATE_LOGGED_IN) {
    return (<>
      You are Logged in!
      <p>
        { JSON.stringify(whoami) }
      </p>
    </>)
  } else if (loginState === LOGIN_STATE_LOGGED_OUT) {
    return (<div>Logged out</div>)
  } else { // (loginState === LOGIN_STATE_LOADING)
    return (<div>Checking logged in state</div>)
  }
}
