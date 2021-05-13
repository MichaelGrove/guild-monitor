import React from 'react'
import SimpleDatatable from '../SimpleDatatable'

const MembersPage = () => {
  const endpoint = 'member'
  const columns = [
    { name: 'Name', value: 'name' },
    { name: 'Rank', value: 'rank' },
    { name: 'Joined', value: 'joined' },
  ]
  return (
    <div>
      MembersPage
      <SimpleDatatable
        endpoint={endpoint}
        columns={columns}
      />
    </div>
  )
}

export default MembersPage
