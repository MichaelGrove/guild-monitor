import React from 'react'
import { connect } from 'react-redux'
import { signin } from '../../actions/auth'

class Login extends React.Component {

  state = {
    email: '',
    password: ''
  }

  onSubmit = async (ev) => {
    ev.preventDefault();

    const { email, password } = this.state

    const success = await this.props.signin({ email, password })
    if (success) {
      this.props.history.push('/')
    }    
  }

  render() {
    return (
      <div>
        <form onSubmit={this.onSubmit}>
          <div>
            <label htmlFor="email">Email</label>
            <input
              type="text"
              id="email"
              name="email"
              value={this.state.email}
              onChange={e => this.setState({ ...this.state, email: e.target.value })}
            />
          </div>
          <div>
            <label htmlFor="password">Password</label>
            <input
              type="text"
              id="password"
              name="password"
              value={this.state.password}
              onChange={e => this.setState({ ...this.state, password: e.target.value })}
            />
          </div>

          <button type="submit">
            Sign In
          </button>
        </form>
      </div>
    )
  }

}

export default connect(null, { signin })(Login)
