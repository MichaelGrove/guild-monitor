import { map } from 'jquery'
import React from 'react'
import { connect } from 'react-redux'
import GuestLayout from './Guest'
import MainLayout from './Main'

const LayoutResolver = ({ isSignedIn, children }) => {
  const LayoutComponent = isSignedIn ? MainLayout : GuestLayout
  return (
    <LayoutComponent>
      {children}
    </LayoutComponent>
  )
}

const mapStateToProps = (state) => 
  ({ isSignedIn: !!state.auth.token })

export default connect(mapStateToProps)(LayoutResolver)
