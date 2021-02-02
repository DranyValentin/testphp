window.addEventListener("load", function(event) {
  document.querySelectorAll('button').forEach(($button) => {
    $button.addEventListener('click', async function (event) {
      try {
        const response = await fetch('../includes/actions/store.php', {
          method: 'POST',
          mode: 'same-origin',
          headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json'
          },
          body: JSON.stringify({id: event.target.dataset.id})
        });
  
        const res = await response.json();
        alert(res);
      } catch(e) {
        console.log(e)
      }
       
    });
  });
});