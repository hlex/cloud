
import React, { Component, PropTypes } from 'react';
import { Link } from 'react-router'

const App = (props) => {
  return (
    <div className="lhniti-board">
      {props.children}
    </div>
  )
}

export default App
