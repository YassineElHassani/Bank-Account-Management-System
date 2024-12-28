const accountType = document.getElementById('accountType');
    const savingsFields = document.getElementById('savingsFields');
    const currentFields = document.getElementById('currentFields');
    const businessFields = document.getElementById('businessFields');

    accountType.addEventListener('change', () => {
    savingsFields.classList.add('hidden');
    currentFields.classList.add('hidden');
    businessFields.classList.add('hidden');

    if (accountType.value === 'savings') savingsFields.classList.remove('hidden');
    else if (accountType.value === 'current') currentFields.classList.remove('hidden');
    else if (accountType.value === 'business') businessFields.classList.remove('hidden');
});