var mainstepper
var introductionstepper
var patientstepper
var symptomstepper

document.addEventListener('DOMContentLoaded', function () {

  mainstepper = new Stepper(document.querySelector('#mainstepper'), {
    linear: false,
    animation: true
  })

  var stepperFormIntro = document.querySelector('#introductionstepper')
  introductionstepper = new Stepper(stepperFormIntro, {
    linear: false,
    animation: true
  })

  patientstepper = new Stepper(document.querySelector('#patientstepper'), {
    linear: false,
    animation: true
  })

  symptomstepper = new Stepper(document.querySelector('#symptomstepper'), {
    linear: false,
    animation: true
  })

})