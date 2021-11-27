const requireRoute = require.context('.', false, /\.js$/)
const routes = []

requireRoute.keys().forEach((fileName) => {
  if (fileName === './index.js') {
    return
  }
  const route = requireRoute(fileName).default
  routes.push(...route)
})

export default routes
