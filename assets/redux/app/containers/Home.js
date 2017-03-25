import React from 'react'
import { bindActionCreators } from 'redux'
import { connect } from 'react-redux'
// import { FormUserAbout } from '../components/FormUserAbout';
import * as Action from '../actions/action'

class Home extends React.Component {
  static propTypes = {
    // name: React.PropTypes.string,
  };

  render() {
    return (
      <div className="">Home</div>
    );
  }
}

// State
function mapStateToProps(state) {
  console.log('Home', state);
  return {
    // todo: state.todo,
  }
}

// Action
const actions = {
  // myActionName: Action.myActionName,
}
function mapDispatchToProps(dispatch) {
  return { actions: bindActionCreators(actions, dispatch) }
}

export default connect(mapStateToProps, mapDispatchToProps)(Home)
