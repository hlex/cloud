import _ from 'lodash';
import { fetchAPI } from './api';

export const updateCustomerData = (customerID, key, value) => {
  const data = {
    customer_id: customerID,
    [key]: value,
  }
  return (dispatch) => {
    fetchAPI('api/customer/update/profile', 'POST', data)
    .then((response) => {
      console.log('responseData', response);
      if (response.fault) {
        // dispatch(ALERT.alertMessage('ERROR', response.fault.message));
      } else {
        dispatch({
          type: 'RECEIVED_CUSTOMER_DATA',
          data: _.get(response, 'response-data', 0),
        })
      }
    })
  }
};