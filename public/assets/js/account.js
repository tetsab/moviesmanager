function setMode(mode) {
    const accountSection = document.getElementById('account-section');

    fetch(`/account.php?mode=${mode}`)
        .then(response => response.text())
        .then(data => {
            accountSection.innerHTML = data;
        })
        .catch(error => console.error('Error:', error));
}
