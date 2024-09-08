window.addEventListener('scroll', function () {
    var header = document.querySelector('.header-sticky');
    if (window.scrollY > 50) {
        header.classList.add('scrollto');
    } else {
        header.classList.remove('scrollto');
    }
});





let mybutton = document.getElementById("backtotop");

window.onscroll = function() {scrollFn()};

function scrollFn() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

function totopFn() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}



    const form = document.getElementById('form');
const result = document.getElementById('result');

form.addEventListener('submit', function(e) {
  e.preventDefault();
  const formData = new FormData(form);
  const object = Object.fromEntries(formData);
  const json = JSON.stringify(object);
  result.innerHTML = "Please wait..."

    fetch('https://api.web3forms.com/submit', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json'
            },
            body: json
        })
        .then(async (response) => {
            let json = await response.json();
            if (response.status == 200) {
                result.innerHTML = json.message;
            } else {
                console.log(response);
                result.innerHTML = json.message;
            }
        })
        .catch(error => {
            console.log(error);
            result.innerHTML = "Something went wrong!";
        })
        .then(function() {
            form.reset();
            setTimeout(() => {
                result.style.display = "none";
            }, 3000);
        });
});


function submitQuiz() {
    const quizForm = document.getElementById("quiz-form");
    const formData = new FormData(quizForm);

    const answers = {
        q1: "Drip irrigation",
        q2: "UNESCO",
        q3: "All of the above",
        q4: "Water from sinks, showers and washing machines",
        q5: "World Water Day",
        q6: "Collecting and storing of rainwater for garden use",
        q7: "The total volume of water used to produce goods and services",
        q8: "Atmospheric water generators that extract moisture from the air",
        q9: "A technique that involves reducing water usage in gardens by using drought-tolerant plants",
        q10: "High energy consumption"
    };

    let score = 0;

    for (let [question, answer] of Object.entries(answers)) {
        if (formData.get(question) === answer) {
            score++;
        }
    }

    Swal.fire({
        title: 'Quiz Completed!',
        text: `You scored ${score}/10`,
        icon: 'success',
        confirmButtonText: 'OK',
        confirmButtonColor: '#007bff',
        footer: 'Thank you for playing!'
    });

    quizForm.reset();
}