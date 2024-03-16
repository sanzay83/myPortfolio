import styles from './App.module.css'
import ButtonContainer from './Component/ButtonContainer'
import Display from './Component/Display'

function App() {
   return (
    <div className={styles.calculator}>
      <Display />
      <ButtonContainer />
    </div>
  )
}

export default App
