import React from 'react'
import DesktopNavigation from './DesktopNavigation'
import MobileNavigation from './MobileNavigation'

const TopNavigation = () => {
  return (
    <nav className="bg-gray-800">

      <DesktopNavigation />

      <MobileNavigation />

    </nav>
  )
}

export default TopNavigation
