import React from 'react'
import _ from 'lodash'
import api from '../../api'
import axios from 'axios'

const cancelTokenSource = axios.CancelToken.source();

/**
 * endpoint,
 * columns: [{
 *   name,
 *   value,
 *   renderer?
 * }, ...]
 */


class SimpleDatatable extends React.Component {
  _isMounted = false;

  constructor(props) {
    super(props)

    this.state = {
      current_page: 1,
      pages: 1,
      sort_column: null,
      sort_direction: 'ASC',
      data: [],
      total: 0,
      per_page: 24
    }
  }

  componentDidMount() {
    this.fetchData();
  }

  componentWillUnmount() {
    this._isMounted = false
  }

  fetchData() {
    this._isMounted = true

    if (!this.props.endpoint) {
      throw new Error('No endpoint given')
    }

    api.get(this.props.endpoint, { cancelToken: cancelTokenSource.token })
      .then(response => {
        const {
          data,
          current_page,
          total,
          last_page
        } = response.data

        if (this._isMounted) {
          this.setState({
            data,
            current_page,
            total,
            pages: last_page
          })
        }
      })
      .catch(err => {
        if (axios.isCancel(err)) {
          console.log('Request canceled', err.message)
        } else {
          console.warn(err)
        }
      })
  }

  renderColumns() {
    return this.props.columns.map(col => {
      return (
        <th key={col.value}>
          {col.name}
        </th>
      )
    })
  }

  renderRowColumns(item) {
    return this.props.columns.map(col => {
      return (
        <td key={col.value}>
          {item[col.value]}
        </td>
      )
    })
  }

  renderRows() {
    if (!this.state.data) {
      return null;
    }

    return this.state.data.map(item => {
      return (
        <tr key={item.id}>
          {this.renderRowColumns(item)}
        </tr>
      )
    })
  }

  renderPaginator() {
    const range = _.range(1, this.state.pages)
    const pages = range.map(page => {
      return (
        <button type="button">
          {page}
        </button>
      )
    })

    return (
      <div>
        {pages}
      </div>
    )
  }

  render() {
    return (
      <div>
        <table>
          <thead>
            <tr>
              {this.renderColumns()}
            </tr>
          </thead>
          <tbody>
            {this.renderRows()}
          </tbody>
        </table>

        {this.renderPaginator()}
      </div>
    )
  }
}

export default SimpleDatatable
