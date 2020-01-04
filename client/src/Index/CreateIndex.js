module.exports = (h2Element, h3Length) => {
  const h2Elements = new Array(h2Element.length)
  let h3ElementArrayLength = h3Length
  for (let h2 = 0; h2 < h2Element.length; h2++) {
    const h2Id = `p2-${h2 + 1}`
    h2Element[h2].id = h2Id

    const h3Elments = new Array(h3ElementArrayLength)
    if (h3ElementArrayLength > 0) {
      let h3 = 0
      let nextElement = h2Element[h2].nextElementSibling
      while (nextElement.localName !== 'h2') {
        if (nextElement.localName === 'h3') {
          const h3Id = `p3-${h2 + 1}-${h3 + 1}`
          const h3Element = nextElement

          h3Element.id = h3Id
          h3Elments[h3] = {
            id: `#${h3Id}`,
            title: h3Element.textContent
          }

          h3++
          h3ElementArrayLength--
        }

        if (nextElement.nextElementSibling === null) {
          break
        }

        nextElement = nextElement.nextElementSibling
      }
    }

    h2Elements[h2] = {
      id: `#${h2Id}`,
      title: h2Element[h2].textContent,
      children: h3Elments
    }
  }
  return h2Elements
}
