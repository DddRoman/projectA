<script setup>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import { Head } from "@inertiajs/inertia-vue3";
import BreezeButton from "@/Components/Button.vue";
import { Link } from "@inertiajs/inertia-vue3";
import { useForm } from "@inertiajs/inertia-vue3";

const props = defineProps({
    structure: {
        type: Object,
        default: () => ({}),
    },
    industries: {
        type: Object,
        default: () => ({}),
    },
    dep_strut:{
        type: Object,
        default: () => ({}),
    },
});


const form = useForm({
    id: props.structure.id,
    name: props.structure.name,
    abv: props.structure.abv,
    ind_id:props.structure.ind_id,
    dependence: props.structure.dependence,
   
});

const dep_strut=useForm({
   selects: props.dep_strut,
});
const submit = () => {
    form.put(route("structures.update", props.structure.id));
};

</script>

<template>
    <Head title="Structure Edit" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Structure Edit
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <form @submit.prevent="submit">
                            <div class="mb-6">
                                <label
                                    for="struct_id"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                                    > Industry:</label
                                >
                                <input 
                                type="hidden"
                                v-model="form.ind_id"
                                name="ind_id"
                                >
                                <div> {{ industries.name }}</div>
                                <div
                                    v-if="form.errors.ind_id"
                                    class="text-sm text-red-600"
                                >
                                    {{ form.errors.ind_id }}
                                </div>
                            </div>
                            <div class="mb-6">
                                <label
                                    for="name"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                                    >Name</label
                                >
                                <input
                                    type="text"
                                    v-model="form.name"
                                    name="name"
                                    id="name"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    placeholder="Name"
                                />
                                <div
                                    v-if="form.errors.name"
                                    class="text-sm text-red-600"
                                >
                                    {{ form.errors.name }}
                                </div>
                            </div>
                            <div class="mb-6">
                                <label
                                    for="abv"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                                    >ABV</label
                                >
                                <input
                                    type="text"
                                    v-model="form.abv"
                                    name="abv"
                                    id="abv"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    placeholder="abv"
                                />
                                <div
                                    v-if="form.errors.abv"
                                    class="text-sm text-red-600"
                                >
                                    {{ form.errors.abv }}
                                </div>
                            </div>
                            <div class="mb-6">
                                <label
                                    for="dependence"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                                    > dependence</label
                                >
                                <select 
                                v-model="form.dependence"
                                name="dependence"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                >
                                <option v-for="option in  props.dep_strut"  :value="option.id" :key="'dep_'+option.id">
                                   {{option.name}} 
                                </option>
                                </select>
                                <div
                                    v-if="form.errors.dependence"
                                    class="text-sm text-red-600"
                                >
                                    {{ form.errors.dependence }}
                                </div>
                           

                            </div>
                            <button
                                type="submit"
                                class="text-black bg-red-100  focus:outline-none  font-medium rounded-lg text-sm px-5 py-2.5 "
                                :disabled="form.processing"
                                :class="{ 'opacity-25': form.processing }"
                            >
                                Submit
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>