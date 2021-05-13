import React from 'react'
import { NavLink } from 'react-router-dom'

const _NavLink = ({ to, children }) => {
  return (
    <NavLink
      to={to}
      exact
      className="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium"
      activeClassName="bg-gray-900 text-white hover:bg-gray-900 hover:text-white"
    >
      {children}
    </NavLink>
  )
}

export default _NavLink
