const pastTime = (days = 7) => {
  let dateList = []
  for (let i = 0; i < days; i++) {
    let differDayMs = new Date(Date.now() - 86400000 * i)
    let month = differDayMs.getMonth() + 1
    let day = differDayMs.getDate()
    dateList.push(`${month}-${day}`)
  }
  return dateList
}

module.exports = {
  pastTime
}
