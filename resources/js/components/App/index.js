import React, { useEffect } from 'react'
import { Router, Route, Switch } from 'react-router-dom'
import { connect } from 'react-redux'
import history from '../../history'
import Layout from '../Layout'
import HomePage from '../HomePage'
import LogsPage from '../LogsPage'
import MembersPage from '../MembersPage'
import Login from '../Login'

import { tryLocalSignin } from '../../actions/auth'

const App = ({ tryLocalSignin }) => {

  useEffect(() => {
    tryLocalSignin();
  }, [])

  return (
    <div>
      <Router history={history}>
        <Layout>
          <Switch>
            <Route path="/login" exact component={Login} />

            <Route path="/" exact component={HomePage} />
            <Route path="/logs" exact component={LogsPage} />
            <Route path="/members" exact component={MembersPage} />
          </Switch>
        </Layout>
      </Router>
    </div>
  )
}

export default connect(null, { tryLocalSignin })(App)
