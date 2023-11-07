//Use the button that is in the html page under the id "button"
let button = document.getElementById('button');

//Use the sentence (div) that is in the html page under the id "quote"
let quote = document.getElementById('quote');

//create a variable witch will contain the quotes that will be generated
let quotes =
[
    '"You dont have to control your thoughts. You just have to stop letting them control you." — Dan Millman',

    '"There is a crack in everything, thats how the light gets in." ― Leonard Cohen',

    '"Deep breathing is our nervous systems love language." — Dr. Lauren Fogel Mersy',

    '"I think its really important to take the stigma away from mental health… My brain and my heart are really important to me. I dont know why I wouldnt seek help to have those things be as healthy as my teeth." — Kerry Washington',

    '"It is not the bruises on the body that hurt. It is the wounds of the heart and the scars on the mind." — Aisha Mirza',

    '"Mental health…is not a destination, but a process. Its about how you drive, not where youre going." — Noam Shpancer',

    '"Not until we are lost do we begin to understand ourselves." ― Henry David Thoreau',

    '"You are not your illness. You have an individual story to tell. You have a name, a history, a personality. Staying yourself is part of the battle." — Julian Seifter',

    '"Happiness can be found even in the darkest of times, if one only remembers to turn on the light." — Albus Dumbledore',

    '"Vulnerability sounds like truth and feels like courage. Truth and courage arent always comfortable, but theyre never weakness." — Brené Brown',

    '"We all fail. We all make mistakes. Its what makes us human" — Master Chief',

    '"Self-care is how you take your power back" — Lalah Delia',

    '"My dark days made me strong. Or maybe I already was strong, and they made me prove it" — Emery Lord',

    '"There is no normal life that is free of pain. Its the very wrestling with our problems that can be the impetus for our growth" — Fred Rogers',

    '"You dont have to be positive all the time. Its perfectly okay to feel sad, angry, annoyed, frustrated, scared and anxious. Having feelings doesnt make you a negative person. It makes you human" — Lori Deschene',

    '"Nothing can dim the light that shines from within" — Lori Deschene',

    '"Even if we dont have the power to choose where we come from, we can still choose where we go from there" — Stephen Chbosky',

    '"You are valuable just because you exist. Not because of what you do or what you have done, but simply because you are" — Max Lucado',

    '"There is no standard normal. Normal is subjective. There are seven billion versions of normal on this planet" — Matt Haig',
    
    '"We are not our trauma. We are not our brain chemistry. Thats part of who we are, but were so much more than that" ― Sam J. Miller'
];

//Create a function that will use the button to pick out one of the quotes that is in the "quotes" variable
button.addEventListener('click', function()
{    
    //Chosses the quote to be displayed after the button is clicked
    var randomQuote = quotes[Math.floor(Math.random() * quotes.length)]

    //Change the sentence related to the id "quote" to the quote that was pick from the randomisation
    quote.innerHTML = randomQuote;

})