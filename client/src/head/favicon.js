const iconAndroidSize = [36, 48, 72, 96, 128, 144, 152, 192, 256, 384, 512]
const iconAppleSize = [57, 60, 72, 76, 114, 120, 144, 152, 180]
const iconSize = [16, 24, 32, 36, 48, 72, 96, 128, 144, 152, 192, 256, 384, 512]

// [即時関数] icon ノーマル
const faviconsNormal = (function(sizeArr) {
  const arrLength = sizeArr.length
  const retVal = new Array(arrLength)
  for (let i = 0; i < sizeArr.length; i++) {
    const size = sizeArr[i]
    const sizeTile = `${size}x${size}`
    retVal[i] = {
      rel: 'icon',
      type: 'image/png',
      sizes: sizeTile,
      href: `/favicons/icon-${sizeTile}.png`
    }
  }

  return retVal
})(iconSize)

// [即時関数] icon apple
const faviconsApple = (function(sizeArr) {
  const arrLength = sizeArr.length
  const retVal = new Array(arrLength)
  for (let i = 0; i < arrLength; i++) {
    const size = sizeArr[i]
    const sizeTile = `${size}x${size}`
    retVal[i] = {
      rel: 'apple-touch-icon',
      sizes: sizeTile,
      href: `/favicons/apple-touch-icon-${sizeTile}.png`
    }
  }

  return retVal
})(iconAppleSize)

// [即時関数] icon Android
const faviconsAndroid = (function(sizeArr) {
  const arrLength = sizeArr.length
  const retVal = new Array(arrLength)
  for (let i = 0; i < sizeArr.length; i++) {
    const size = sizeArr[i]
    const sizeTile = `${size}x${size}`
    retVal[i] = {
      rel: 'icon',
      type: 'image/png',
      sizes: sizeTile,
      href: `/android-chrome-${sizeTile}.png`
    }
  }

  return retVal
})(iconAndroidSize)

const faviconMain = [
  { rel: 'icon', type: 'image/x-icon', href: '/favicons/favicon.ico' }
]

// mainfest.jsonの記述
const manifest = [{ rel: 'manifest', href: '/manifest.json' }]

// microsoft iconの記述
const msIcon = [
  {
    rel: 'shortcut icon',
    type: 'image/vnd.microsoft.icon',
    href: '/favicons/favicon.ico'
  }
]

// スプレッド演算子
const favicons = [
  ...faviconMain,
  ...faviconsNormal,
  ...faviconsApple,
  ...faviconsAndroid,
  ...manifest,
  ...msIcon
]

module.exports = favicons
