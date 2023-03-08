const BACKCONTROLLER_BASE="https://account.ncvo.org.uk"

// BELOW HERE SHOULD NOT NEED TO CHANGE
export const WHO_AM_I_PATH="/api/auth/whoami"
export const WHO_AM_I_ROUTE = BACKCONTROLLER_BASE.replace(/\/$/, '') + WHO_AM_I_PATH

export const LOGIN_STATE_LOADING="loading"
export const LOGIN_STATE_LOGGED_IN="logged_in"
export const LOGIN_STATE_LOGGED_OUT="logged_out"
export const LOGIN_STATE_ERRORED="login_errored"
