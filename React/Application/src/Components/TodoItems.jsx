import Items from "./Items";
import styles from "./TodoItems.module.css"

function TodoItems({todoItems, onDeleteClick}) {
  return (
      <div className={styles.itemsContainer}>
        {todoItems.map(item => (
          <Items todoName={item.name} todoDate={item.dueDate} onDeleteClick={onDeleteClick} />
        ))}
      </div>
  )
}

export default TodoItems;