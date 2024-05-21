function play() {
  responsiveVoice.setDefaultVoice("Indonesian Female")
  responsiveVoice.speak(document.getElementById("textdies").textContent)
}

function pause() {
  responsiveVoice.pause()
  responsiveVoice.resume()
}

function stop() {
  responsiveVoice.cancel()
}
