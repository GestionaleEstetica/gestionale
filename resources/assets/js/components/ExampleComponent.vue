<tbody class="text-center">
            <tr v-if="treatmentView" v-for="treatment in filteredTreatments">
          <td>{{ treatment.id }}</td>
          <td>{{ treatment.name }}</td>
          <td>{{ treatment.brand }}</td>
          <td>{{ treatment.quantity }}</td>
          <td>{{ treatment.price }}</td>
            
        <td class="text-center">
            <button @click="pushItem(treatment,'treatment')">+</button>
        </td>

          <td class="text-center">
            <button @click="removeItem(treatment,'treatment')">-</button>
        </td>
</tr>
        <h5>{{ this.listedProducts }}</h5>
        <h5>{{ this.listedTreatments }}</h5>
                </tbody>