<script setup>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import { Head } from "@inertiajs/inertia-vue3";
import BreezeButton from "@/Components/Button.vue";
import { Link } from "@inertiajs/inertia-vue3";
import { Inertia } from "@inertiajs/inertia";
import { useForm } from '@inertiajs/inertia-vue3'
const props = defineProps({
    docs: {
        type: Object,
        default: () => ({}),
    },
    industr: {
        type: Object,
        default: () => ({}),
    },
    struct: {
        type: Object,
        default: () => ({}),
    },

});
const form = useForm();

function destroy(id) {
    if (confirm("Are you sure you want to Delete")) {
        form.delete(route('docs.destroy', id));
    }
}
</script>

<template>

  <Head title="Docs" />

<BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Docs Index  
            </h2>
            <Link
            :href="
                route(
                    'docs.otheri'
                )
            "
            class="px-4 py-2 text-black bg-blue-100 rounded-lg" >Other industry</Link
             >
             <Link
            :href="
                route(
                    'docs.others'
                )
            "
            class="px-4 py-2 text-black bg-blue-100 rounded-lg" >Other Department</Link
             >
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">

                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                       <div class="mb-2">
                            <Link :href="route('docs.create')">
                                <BreezeButton>Add Doc</BreezeButton></Link
                            >
                        </div>
                         <div
                            class="relative overflow-x-auto shadow-md sm:rounded-lg"
                        >
                            <table
                                class="w-full text-sm text-left text-gray-500 dark:text-gray-400"
                            >
                                <thead
                                    class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400"
                                >
                                    <tr>
                                        <th scope="col" class="px-6 py-3">#</th>
                                         <th scope="col" class="px-6 py-3">
                                            shifr
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Name
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Edit
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Delete
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr
                                        v-for="doc in props.docs"
                                        :key="doc.id"
                                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700"
                                    ><th
                                            scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap"
                                        >
                                            {{ doc.id }}
                                        </th>
                                        <th
                                            scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap"
                                        >
                                        <Link :href="route('docs.items',doc.version_id)">
                                            {{props.industr+'-'+props.struct+'-'+doc.shifr+'-'+doc.version+'-'+doc.year }}
                                        </Link>
                                        </th>
                                        <th
                                            scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap"
                                        >
                                            {{ doc.name }}
                                        </th>
                                        


                                        <td class="px-6 py-4">
                                            <Link
                                                :href="
                                                    route(
                                                        'docs.edit',
                                                        doc.id
                                                    )
                                                "
                                               class="px-4 py-2 text-white bg-blue-600 rounded-lg" >Edit</Link
                                            >
                                        </td>
                                        <td class="px-6 py-4">
                                            <BreezeButton
                                                class="bg-red-700 text-white "
                                                @click="destroy(doc.id)"
                                            >
                                                Delete
                                            </BreezeButton>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        
    </BreezeAuthenticatedLayout>
</template>