import React, { Component } from 'react'
import { connect } from 'react-redux'
import { getLogs } from '../../actions'

class LogsPage extends Component {

  componentDidMount() {
    this.props.getLogs()
  }

  renderTableRows() {
    if (!this.props.logs.length) {
      return (
        <tr>
          <td colSpan="3">
            No rows
          </td>
        </tr>
      )
    }

    return this.props.logs.map(log => {
      return (
        <tr key={log.id}>
          <td>
            {log.id}
          </td>
          <td>
            {log.log_type}
          </td>
          <td>
            {log.log_datetime}
          </td>
        </tr>
      )
    })
  }

  render() {
    return (
      <div>
        <table>
          <thead>
            <tr>
              <th>#</th>
              <th>Type</th>
              <th>Datetime</th>
            </tr>
          </thead>
          <tbody>
            {this.renderTableRows()}
          </tbody>
        </table>
      </div>
    )
  }
}

const mapStateToProps = (state) => {
  return {
    ...state.logs
  }
}

export default connect(mapStateToProps, { getLogs })(LogsPage)
