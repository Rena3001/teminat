document.querySelectorAll('.custom_select').forEach(select => {
    const selectText = select.querySelector('.custom_select_text');
    const options = select.querySelector('.custom_options');
    const input = select.nextElementSibling;
  
    select.addEventListener('click', () => {
      document.querySelectorAll('.custom_select').forEach(otherSelect => {
        if (otherSelect !== select) otherSelect.classList.remove('open');
      });
      select.classList.toggle('open');
    });
  
    options.addEventListener('click', (e) => {
      if (e.target.tagName === 'LI') {
        selectText.textContent = e.target.textContent;
        input.value = e.target.dataset.value;
        
            if (select.closest('.custom_select_wrapper').nextElementSibling) {
                const nextSelect = select.closest('.custom_select_wrapper').nextElementSibling.querySelector('.custom_select');
                if(nextSelect){
                    const nextSelectText = nextSelect.querySelector('.custom_select_text');
                    const nextInput = nextSelect.nextElementSibling;
                    nextSelectText.textContent = 'Select Sub Category';
                    nextInput.value = 'option1';
                }
            }
        }
    });
    select.classList.remove('open'); 
  });
  
  document.addEventListener('click', (e) => {
    if (!e.target.closest('.custom_select')) {
      document.querySelectorAll('.custom_select').forEach(select => {
        select.classList.remove('open');
      });
    }
  });


document.querySelectorAll('.custom_select_wrapper:first-child .custom_options li').forEach(option => {
    option.addEventListener('click', () => {
      const secondSelectText = document.querySelector('.custom_select_wrapper:nth-child(3) .custom_select_text');
      const secondInput = document.querySelector('.custom_select_wrapper:nth-child(3) input');
      secondSelectText.textContent = 'products';
      secondInput.value = 'option1';
    });
  });