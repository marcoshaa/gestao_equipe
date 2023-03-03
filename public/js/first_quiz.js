const progress = document.getElementById('progress')
const prev = document.getElementById('prev')
const next = document.getElementById('next')
const sub = document.getElementById('sub')
const questao = document.getElementById('questao')
const circles = document.querySelectorAll('.circle')
sub.style.display = "none";
let currentActive = 1


next.addEventListener('click', () => {
    currentActive++
    if(currentActive > circles.length) {
        currentActive = circles.length
    }
    update('avc')
})

prev.addEventListener('click', () => {
    currentActive--
    if(currentActive < 1) {
        currentActive = 1
    }
    update('vlt')
})

function update(msg) {
    console.log(currentActive);
    circles.forEach((circle, idx) => {                
        if(idx < currentActive) {
            circle.classList.add('active')
        } else {
            circle.classList.remove('active')
        }
    })

    questaoAtual(msg,currentActive);
    const actives = document.querySelectorAll('.active')

    progress.style.width = (actives.length - 1) / (circles.length - 1) * 100 + '%'

    if(currentActive === 1) {
        prev.disabled = true
    } else if(currentActive === circles.length) {
        next.disabled = true
        next.style.display = "none";
        sub.style.display = "initial";
    } else {
        prev.disabled = false
        next.disabled = false
        next.style.display = "initial";
        sub.style.display = "none";
    }

}