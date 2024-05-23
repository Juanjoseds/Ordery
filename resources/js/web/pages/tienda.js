$(() =>{
    initRankingEstrellas()
});

function initRankingEstrellas(){
    $(".valoracion-estrellas").rateYo({
        rating: 3.6,
        starWidth: "14px",
        spacing: "10px"
    });
}

