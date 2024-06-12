// Function to calculate the total marks for a subject (Oral + Written) and update the Total column
function calculateSubjectTotal(input) {
    var row = input.parentNode.parentNode;
    var oralMarks = parseInt(row.cells[input.parentNode.cellIndex - 1].querySelector('input').value) || 0;
    var writtenMarks = parseInt(input.value) || 0;
    var totalInput = row.cells[input.parentNode.cellIndex + 1].querySelector('input');
    totalInput.value = oralMarks + writtenMarks;
    //calculateMainTotal();
}

// Function to calculate the main total (out of 600) and the percentage
// function calculateMainTotal() {
//     var table = document.getElementById("gradeSheet");
//     var tbody = table.getElementsByTagName('tbody')[0];
//     var rows = tbody.getElementsByTagName('tr');
//     var mainTotal = 0;

//     // Loop through each row to calculate the main total
//     for (var i = 1; i < rows.length; i++) {
//         var row = rows[i];
//         var inputs = row.getElementsByTagName('input');
//         var totalMarks = parseInt(inputs[inputs.length - 2].value) || 0;
//         mainTotal += totalMarks;
//     }

//     // Update the main total input in the last row
//     var mainTotalInput = rows[rows.length - 1].querySelector('input[type="text"][readonly]:nth-last-child(2)');
//     mainTotalInput.value = mainTotal || '';

//     // Calculate the percentage and update the percentage input in the last row
//     var percentageInput = rows[rows.length - 1].querySelector('input[type="text"][readonly]:last-child');
//     var percentage = (mainTotal / (rows.length - 1) / 600) * 100;
//     percentageInput.value = percentage.toFixed(2) + '%';
// }

// Function to add a new row to the grade sheet
// function addRow() {
//     var table = document.getElementById("gradeSheet").getElementsByTagName('tbody')[0];
//     var newRow = table.insertRow(table.rows.length - 1);
//     var cell = newRow.insertCell(0);
//     cell.innerHTML = '<input type="text" placeholder="Roll No." name="rollNo">';
//     cell = newRow.insertCell(1);
//     cell.innerHTML = '<input type="text" placeholder="Student Name">';
//     for (var i = 0; i < 6; i++) {
//         cell = newRow.insertCell(2 + i * 3);
//         cell.innerHTML = '<input type="number" min="0" max="20" placeholder="Oral" oninput="calculateSubjectTotal(this)" name="Subject' + (i + 1) + 'Oral">';
//         cell = newRow.insertCell(3 + i * 3);
//         cell.innerHTML = '<input type="number" min="0" max="80" placeholder="Written" oninput="calculateSubjectTotal(this)" name="Subject' + (i + 1) + 'Written">';
//         cell = newRow.insertCell(4 + i * 3);
//         cell.innerHTML = '<input type="text" readonly>';
//     }
//     cell = newRow.insertCell(22);
//     cell.innerHTML = '<input type="text" readonly>';
//     cell = newRow.insertCell(23);
//     cell.innerHTML = '<input type="text" readonly>';
// }


// function calculateSubjectTotal(input) {
//     var row = input.parentNode.parentNode;
//     var oralMarks = parseInt(row.cells[input.parentNode.cellIndex - 1].querySelector('input').value) || 0;
//     var writtenMarks = parseInt(input.value) || 0;
//     var totalInput = row.cells[input.parentNode.cellIndex + 1].querySelector('input');
//     var total = oralMarks + writtenMarks;
//     totalInput.value = total;
//     updateSubjectTotal(row.cells, total);
//     calculateMainTotal();
// }

// function updateSubjectTotal(cells, total) {
//     cells[3].querySelector('input').value = total;
// }

// function calculateMainTotal() {
//     var table = document.getElementById("gradeSheet");
//     var tbody = table.getElementsByTagName('tbody')[0];
//     var rows = tbody.getElementsByTagName('tr');
//     var mainTotal = 0;
//     for (var i = 1; i < rows.length; i++) {
//         var row = rows[i];
//         var inputs = row.getElementsByTagName('input');
//         var totalMarks = parseInt(inputs[3].value) || 0;
//         mainTotal += totalMarks;
//     }
//     var mainTotalInput = rows[rows.length - 1].querySelector('input[type="text"][readonly]:nth-last-child(2)');
//     mainTotalInput.value = mainTotal || '';

//     var percentageInput = rows[rows.length - 1].querySelector('input[type="text"][readonly]:last-child');
//     var percentage = (mainTotal / ((rows.length - 1) * 100)) * 100;
//     percentageInput.value = percentage.toFixed(2) + '%';
// }

// function addRow() {
//     var table = document.getElementById("gradeSheet").getElementsByTagName('tbody')[0];
//     var newRow = table.insertRow(table.rows.length - 1);
//     var cell = newRow.insertCell(0);
//     cell.innerHTML = '<input type="text" placeholder="Roll No.">';
//     for (var i = 0; i < 6; i++) {
//         cell = newRow.insertCell(1 + i * 4);
//         cell.innerHTML = '<input type="number" min="0" max="20" placeholder="Oral" oninput="calculateSubjectTotal(this)" name="Subject' + (i + 1) + 'Oral">';
//         cell = newRow.insertCell(2 + i * 4);
//         cell.innerHTML = '<input type="number" min="0" max="80" placeholder="Written" oninput="calculateSubjectTotal(this)" name="Subject' + (i + 1) + 'Written">';
//         cell = newRow.insertCell(3 + i * 4);
//         cell.innerHTML = '<input type="text" readonly>';
//     }
//     cell = newRow.insertCell(22);
//     cell.innerHTML = '<input type="text" readonly>';
//     cell = newRow.insertCell(23);
//     cell.innerHTML = '<input type="text" readonly>';
// }

// window.onload = function () {
//     calculateMainTotal();
// };