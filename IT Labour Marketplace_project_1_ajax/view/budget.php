<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Budget Management</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
        }
        .form-section {
            margin-bottom: 20px;
        }
        input[type="text"], input[type="number"], button {
            padding: 10px;
            margin: 5px 0;
            width: 100%;
        }
        .chart-container {
            margin-top: 30px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Budget Management</h1>

        <!-- Budget Setting Section -->
        <div class="form-section">
            <h2>Set Total Budget</h2>
            <input type="number" id="total-budget" placeholder="Enter total budget" />
            <button onclick="setBudget()">Set Budget</button>
        </div>

        <!-- Expense Entry Section -->
        <div class="form-section">
            <h2>Add Expenses</h2>
            <input type="text" id="expense-name" placeholder="Expense Name" />
            <input type="number" id="expense-amount" placeholder="Expense Amount" />
            <button onclick="addExpense()">Add Expense</button>
        </div>

        <!-- Clear Button -->
<div class="form-section">
    <button onclick="clearBudget()">Clear</button>
</div>


        <!-- Budget Visualization -->
        <div class="chart-container">
            <h2>Budget Visualization</h2>
            <canvas id="budget-chart"></canvas>
        </div>
    </div>

    <script>
        let chart;

        function setBudget() {
            const totalBudget = document.getElementById('total-budget').value;

            fetch('../controller/checkbudget.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                body: `action=setBudget&total_budget=${totalBudget}`
            })
            .then(response => response.json())
            .then(data => {
                alert(data.message);
                updateChart(data.data);
            });
        }

        function addExpense() {
            const expenseName = document.getElementById('expense-name').value;
            const expenseAmount = document.getElementById('expense-amount').value;

            fetch('../controller/checkbudget.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                body: `action=addExpense&expense_name=${expenseName}&expense_amount=${expenseAmount}`
            })
            .then(response => response.json())
            .then(data => {
                alert(data.message);
                updateChart(data.data);
            });
        }

        function updateChart(data) {
            const { total_budget, expenses } = data;

            const expenseAmounts = expenses.map(function(exp) { return exp.amount});
            const expenseNames = expenses.map(exp => exp.name);
            const remainingBudget = total_budget - expenseAmounts.reduce((acc, curr) => acc + curr, 0);

            const chartData = {
                labels: [...expenseNames, 'Remaining Budget'],
                datasets: [{
                    label: 'Budget Breakdown',
                    data: [...expenseAmounts, remainingBudget],
                    backgroundColor: [...Array(expenseNames.length).fill('rgba(75, 192, 192, 0.2)'), 'rgba(255, 99, 132, 0.2)'],
                    borderColor: [...Array(expenseNames.length).fill('rgba(75, 192, 192, 1)'), 'rgba(255, 99, 132, 1)'],
                    borderWidth: 1
                }]
            };

            if (chart) chart.destroy();
            const ctx = document.getElementById('budget-chart').getContext('2d');
            chart = new Chart(ctx, {
                type: 'pie',
                data: chartData,
                options: {
                    responsive: true
                }
            });
        }

        function clearBudget() {
    fetch('../controller/checkbudget.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: 'action=clearBudget'
    })
    .then(response => response.json())
    .then(data => {
        alert(data.message);
        updateChart({ total_budget: 0, expenses: [] });
    });
}



    </script>
</body>
</html>
