document.addEventListener('DOMContentLoaded', function () {
    const display = document.getElementById('result');
    let operand1 = '';
    let operator = '';
    let operand2 = '';
    let result = '';

    // Fungsi untuk menampilkan hasil ke layar
    function updateDisplay() {
        display.textContent = result === '' ? operand1 + operator + operand2 : result;
    }

    // Fungsi untuk menambahkan digit ke operand saat tombol angka ditekan
    function appendNumber(number) {
        if (operator === '') {
            operand1 += number;
        } else {
            operand2 += number;
        }
        updateDisplay();
    }

    // Fungsi untuk menambahkan operator saat tombol operator ditekan
    function setOperator(op) {
        if (operator === '' && operand1 !== '') {
            operator = op;
        } else if (operator !== '' && operand2 !== '') {
            calculate();
            operator = op;
        }
        updateDisplay();
    }

    // Fungsi untuk menghitung hasil operasi
    function calculate() {
        const num1 = parseFloat(operand1);
        const num2 = parseFloat(operand2);
        switch (operator) {
            case '+':
                result = (num1 + num2).toString();
                break;
            case '-':
                result = (num1 - num2).toString();
                break;
            case '*':
                result = (num1 * num2).toString();
                break;
            case '/':
                result = (num1 / num2).toString();
                break;
            case '%':
                result = ((num1 / 100) * num2).toString();
                break;
            default:
                break;
        }
        operand1 = '';
        operator = '';
        operand2 = '';
    }

    // Event listener untuk tombol-tombol angka
    document.querySelectorAll('.calculator button[id]').forEach(button => {
        button.addEventListener('click', function () {
            const id = this.id;
            if (!isNaN(id)) {
                appendNumber(id);
            } else if (id === '.') {
                if (operator === '' && operand1.indexOf('.') === -1) {
                    operand1 += id;
                } else if (operator !== '' && operand2.indexOf('.') === -1) {
                    operand2 += id;
                }
                updateDisplay();
            } else if (id === 'percent') {
                setOperator('%');
            } else if (id === 'add') {
                setOperator('+');
            } else if (id === 'substract') {
                setOperator('-');
            } else if (id === 'multiply') {
                setOperator('*');
            } else if (id === 'div') {
                setOperator('/');
            } else if (id === 'equals') {
                calculate();
                updateDisplay();
            } else if (id === 'clear') {
                if (operand2 !== '') {
                    operand2 = '';
                } else if (operator !== '') {
                    operator = '';
                } else {
                    operand1 = '';
                }
                updateDisplay();
            } else if (id === 'reset') {
                operand1 = '';
                operator = '';
                operand2 = '';
                result = '';
                updateDisplay();
            } else if (id === 'backspace') {
                if (operand2 !== '') {
                    operand2 = operand2.slice(0, -1);
                } else if (operator !== '') {
                    operator = '';
                } else {
                    operand1 = operand1.slice(0, -1);
                }
                updateDisplay();
            } else if (id === 'minus') {
                // Jika operand1 sedang aktif, ubah tanda operand1
                if (operator === '' && operand1 !== '') {
                    operand1 = (-parseFloat(operand1)).toString();
                }
                // Jika operand2 sedang aktif, ubah tanda operand2
                else if (operator !== '' && operand2 !== '') {
                    operand2 = (-parseFloat(operand2)).toString();
                }
                updateDisplay();
            }
        });
    });
});
