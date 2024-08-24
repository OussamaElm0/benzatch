const sortBy = document.getElementById('sort-by')
sortBy.addEventListener('change', function (){
    const { value } = sortBy
    window.location.href = value !== "" ? "?sortBy=" + value : "montres"
})
