const usersLIist = document.querySelector('.Userslist');
const users = document.getElementById('nbuser');
const username = document.getElementById('pseudo');
const poucentage = document.getElementById('pourcentage') //le textcontent de pourcentage doit etre entrée à la ligne 37 à la place de 50

const note = document.querySelector('.notecontent');

const allUsersNames = document.getElementById("allUsersNames")
const decoupeNames = allUsersNames.textContent.split(",")

// let progresDone = document.querySelector(".progress-done")

const amountBadgesExist = document.getElementById("amountBadgesExist")
console.log(amountBadgesExist.textContent);

const AmountAllBadgesOfAllUSers = document.getElementById("AmountAllBadgesOfAllUSers")
const decoupeAllBadges = AmountAllBadgesOfAllUSers.textContent.split(",")


const amountBadgesExit = document.getElementById("amountBadgesExit")






for (i = 0; i < users.textContent; i++) {

    let userCard = document.createElement('div');
    userCard.className = 'usercard';
    userCard.id = i;
    usersLIist.appendChild(userCard);
    
        let figure = document.createElement('figure');
        userCard.appendChild(figure);

        let image = document.createElement('img');
        image.className ='userimage';
        image.src = './assets/image/avatar.png';
        figure.appendChild(image);

        let name = document.createElement('p');
        name.className ='name';
        name.textContent = decoupeNames[i];
        userCard.appendChild(name);

        let progression = document.createElement('p');
        progression.className ='progression';
        progression.textContent = "Progression:";
        userCard.appendChild(progression);

        let progress = document.createElement('div');
        progress.classList.add('progress')
        userCard.appendChild(progress);

        let progressionDone = document.createElement('div');
        progressionDone.classList.add("progress-done");
        let pourcentUser = Math.ceil((100/amountBadgesExist.textContent)*decoupeAllBadges[i])

        if(pourcentUser>1){
            progressionDone.textContent = pourcentUser +"%";
        }else{
            progressionDone.textContent = "0%";
            progressionDone.style.marginLeft ="15px"

        }
        progressionDone.style.width = pourcentUser + "%"
        progressionDone.style.opacity = 100%
        progress.appendChild(progressionDone);
    
}

const userLIist = document.querySelector('.userslist');

const progress = document.querySelector('.progress-done');


setTimeout(() => {
    progress.style.width = progress.getAttribute('data-done') + '%';
    progress.style.opacity = 1;
}, 500)

