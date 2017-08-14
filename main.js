const electron = require('electron')
const app = electron.app
const BrowserWindow = electron.BrowserWindow
const path = require('path')
const url = require('url')
var ipc = require('ipc')
let loginWindow
let registerWindow
let gitWindow
function show() {
  registerWindow.show()
}

function createWindow () {
  loginWindow = new BrowserWindow({width: 350, height: 285, frame:false})
  loginWindow.loadURL(url.format({
    pathname: path.join(__dirname, 'login.html'),
    protocol: 'file:',
    slashes: true
  }))
  // loginWindow.webContents.openDevTools()
  loginWindow.on('closed', function () {
    loginWindow = null
  })

}
app.on('ready', createWindow)
exports.regWindow = () => {
  registerWindow = new BrowserWindow({width: 350, height: 285, frame:false})
  registerWindow.loadURL(url.format({
    pathname: path.join(__dirname, 'register.html'),
    protocol: 'file:',
    slashes: true,
    show: false
  }))
  registerWindow.webContents.openDevTools()
  registerWindow.on('closed', function () {
    registerWindow = null
  })
}
exports.gitWindow = () => {
  gitWindow = new BrowserWindow({width: 500, height: 500, fullscreen:true})
  gitWindow.loadURL(url.format({
    pathname: path.join(__dirname, 'git.html'),
    protocol: 'file:',
    slashes: true,
    show: false
  }))
  // gitWindow.webContents.openDevTools()
  gitWindow.on('closed', function () {
    gitWindow = null
  })
  loginWindow.close();
}

//Annoying OSX stuff
// Quit when all windows are closed.
app.on('window-all-closed', function () {
  if (process.platform !== 'darwin') {
    app.quit()
  }
})

app.on('activate', function () {
  if (loginWindow === null) {
    createWindow()
  }
})
