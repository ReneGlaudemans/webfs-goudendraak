<template>
  <div class="gerecht-filter">
    <input
      v-model="filters.name"
      type="text"
      placeholder="Filter op naam"
      class="input"
    />

    <input
      v-model="filters.id"
      type="text"
      placeholder="Filter op nummer"
      class="input"
    />

    <select v-model="filters.category" class="input">
      <option value="">Alle categorieën</option>
      <option
        v-for="categorie in uniekeCategorieen"
        :key="categorie"
        :value="categorie"
      >
        {{ categorie }}
      </option>
    </select>

    <table class="itemToSelectTable">
      <tbody>
        <tr v-for="gerecht in gefilterdeGerechten" :key="gerecht.id">
        <td>
          {{ gerecht.id ?? '' }}.
        </td>
        <td>
          {{ gerecht.name }}
        <span v-if="gerecht.description">
          <i>({{ gerecht.description }})</i>
        </span>
      </td>
      <td>
        € {{ Number(gerecht.price).toLocaleString('nl-NL', { minimumFractionDigits: 2 }) }}
      </td>
      <td>
        <button @click="emitAddMenuItem(gerecht.id)">Toevoegen</button>
      </td>
    </tr>
  </tbody>
</table>
  </div>
</template>

<script setup>
import { ref, computed } from 'vue';

const emit = defineEmits(['add-menu-item']);
// Props van Laravel of via API
const props = defineProps({
  categories: {
    type: Array,
    required: true,
  }
});

// Filterwaarden
const filters = ref({
  name: '',
  id: '',
  category: '',
});


const allDishes = computed(() => {
  return props.categories.flatMap(category =>
    category.dishes.map(dish => ({
      ...dish,
      category: category.name
    }))
  );
});

// Unieke categorieën voor dropdown
const uniekeCategorieen = computed(() => {
   return props.categories.map(c => c.name);
});

// Filter logica
const gefilterdeGerechten = computed(() => {
  return allDishes.value.filter(gerecht => {
    const naamMatch = gerecht.name.toLowerCase().includes(filters.value.name.toLowerCase());
    const nummerMatch = filters.value.id === '' || gerecht.id.toString().includes(filters.value.id);
    const categorieMatch = filters.value.category === '' || gerecht.category === filters.value.category;
    return naamMatch && nummerMatch && categorieMatch;
  });
});
const emitAddMenuItem = (id) => {
    // Emit voor parent (Vue)
    emit('add-menu-item', id);
    // Emit als native event voor legacy JS
    document.dispatchEvent(new CustomEvent('vue:add-menu-item', { detail: id }));
};
</script>

<style scoped>
.input {
  display: block;
  margin: 8px 0;
  padding: 6px;
  width: 100%;
}

.gerecht-lijst {
  list-style: none;
  padding: 0;
}

.gerecht-lijst li {
  padding: 4px 0;
}
</style>