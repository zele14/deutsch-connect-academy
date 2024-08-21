document.getElementById('start-quiz').addEventListener('click', function() {
    const level = document.getElementById('level-select').value;
    loadQuiz(level);
});

async function loadQuiz(level) {
    let quizData;
    switch(level) {
        case 'A1':
            quizData = await import('./A1Quiz.js').then(module => module.A1Quiz);
            break;
        case 'A2':
            quizData = await import('./A2Quiz.js').then(module => module.A2Quiz);
            break;
        case 'B1':
            quizData = await import('./B1Quiz.js').then(module => module.B1Quiz);
            break;
        case 'B2':
            quizData = await import('./B2Quiz.js').then(module => module.B2Quiz);
            break;
        default:
            console.error('Invalid level selected');
            return;
    }

    const selectedQuestions = selectRandomQuestions(quizData, 10);
    displayQuiz(selectedQuestions);
}

function selectRandomQuestions(quizData, numQuestions) {
    const shuffled = quizData.sort(() => 0.5 - Math.random());
    return shuffled.slice(0, numQuestions);
}

function displayQuiz(quizData) {
    const quizContainer = document.getElementById('quiz-container');
    quizContainer.innerHTML = '';
    
    quizData.forEach((q, index) => {
        const questionDiv = document.createElement('div');
        questionDiv.className = 'question';
        
        const questionTitle = document.createElement('h3');
        questionTitle.textContent = `Q${index + 1}: ${q.question}`;
        questionDiv.appendChild(questionTitle);

        q.options.forEach((option, i) => {
            const optionLabel = document.createElement('label');
            optionLabel.textContent = option;
            
            const optionInput = document.createElement('input');
            optionInput.type = 'radio';
            optionInput.name = `question${index}`;
            optionInput.value = option;

            optionLabel.prepend(optionInput);
            questionDiv.appendChild(optionLabel);
            questionDiv.appendChild(document.createElement('br'));
        });

        quizContainer.appendChild(questionDiv);
    });

    document.getElementById('submit-quiz').style.display = 'inline';
}

document.getElementById('submit-quiz').addEventListener('click', function() {
    const quizContainer = document.getElementById('quiz-container');
    const questions = quizContainer.getElementsByClassName('question');
    let score = 0;

    Array.from(questions).forEach((question, index) => {
        const selectedOption = question.querySelector('input[type="radio"]:checked');
        if (selectedOption && selectedOption.value === quizData[index].answer) {
            score++;
        }
    });

    const resultDiv = document.getElementById('quiz-result');
    resultDiv.textContent = `Your Score: ${score} / ${questions.length}`;
});
