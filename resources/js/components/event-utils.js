
let eventGuid = 0
const today = new Date()
let todayStr = today.toISOString().replace(/T.*$/, '') // YYYY-MM-DD of today
// const yesterday = new Date(today)
// yesterday.setDate(yesterday.getDate() - 1)
// let yesterdayStr = yesterday.toISOString().replace(/T.*$/, '')

export const INITIAL_EVENTS = [
  {
    id: createEventId(),
    title: 'All-day Go out event',
    start: todayStr
  },
  {
    id: createEventId(),
    title: 'Timed Study event',
    start: todayStr + 'T12:00:00'
  }
]

export function createEventId() {
  return String(eventGuid++)
}
