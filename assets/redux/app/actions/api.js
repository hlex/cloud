require('es6-promise').polyfill();
import fetch from 'isomorphic-fetch';
export const baseURL = 'http://localhost:8012/sourcing-hub';
export const headers = {
  WEB_METHOD_CHANNEL: 'WEBUI',
  E2E_REFID: '',
  'Content-Type': 'application/json',
};

export const fetchAPI = (url, method = 'GET', data = false) => {

  // Header
  let Header = {
    method: method,
    headers: headers,
    credentials: 'same-origin',
  }

  // If there are data for method POST assign body to header
  if (data) Header = { ...Header, body: JSON.stringify(data) }

  // Fetch API
  return fetch(`${baseURL}/${url}`, Header).then((response) => {
    let _response = response
    // if (_response.status >= 200 && _response.status < 300) {
    //   _response = _response.json()
    // }
    return _response.json();
  })
  .catch((error) => { console.error('request failed', error); });
};