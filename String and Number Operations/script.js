function findLeftmostVowelPosition(str) {
    var vowels = ['a', 'e', 'i', 'o', 'u'];
    for (var i = 0; i < str.length; i++) {
      if (vowels.includes(str[i].toLowerCase())) {
        return i + 1; 
      }
    }
    return -1;
  }

  
  function reverseNumberDigits(num) {
    var reversedNum = parseInt(num.toString().split('').reverse().join(''));
    return reversedNum;
  }

  
  function handleSubmit(event) {
    event.preventDefault(); 
    var stringInput = document.getElementById('string-input').value;
    var numberInput = parseInt(document.getElementById('number-input').value);

    var vowelPosition = findLeftmostVowelPosition(stringInput);
    var reversedNumber = reverseNumberDigits(numberInput);

    
    document.getElementById('vowel-output').textContent = vowelPosition !== -1 ? 'Position of the left-most vowel: ' + vowelPosition : 'No vowel found.';
    document.getElementById('reverse-output').textContent = 'Reversed number: ' + reversedNumber;
  }