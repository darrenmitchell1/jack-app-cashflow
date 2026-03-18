<script setup>

const props = defineProps({
    cashflow_items: {
        type: JSON,
        required: true,
    }
});
</script>

<template>

    <table>
        <thead>
            <tr>
                <th>Type</th>
                <th>Description</th>
                <th>Date Applied</th>
                <th>Recurring Period</th>
                <th>In / Out</th>
                <th>Value</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="cashflow_item in cashflow_items" :key="cashflow_item.uuid">
                <td>{{ cashflow_item.cashflow_type.name }}</td>
                <td>{{ cashflow_item.description }}</td>
                <td>{{ cashflow_item.applied_from }}</td>
                <td>{{ cashflow_item.recurring_period }}</td>
                <td>{{ cashflow_item.income_or_expenditure }}</td>
                <td>{{ cashflow_item.value }}</td>
            </tr>
        </tbody>
    </table>
</template>
