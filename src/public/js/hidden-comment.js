document.querySelector('.show-more').addEventListener('click', function() {
    let hiddenComments = document.querySelectorAll('.hidden');
    if (this.textContent === '...') {
        hiddenComments.forEach(function(comment) {
            comment.style.display = 'table-cell';
        });
        this.textContent = 'show less';
    } else {
        hiddenComments.forEach(function(comment) {
            comment.style.display = 'none';
        });
        this.textContent = '...';
    }
});