import "./App.css";
import { MemberCard } from "./components/Card";
import teamData from "./data/Agora_web_developer_team_data.json";

function App() {
  const { team } = teamData;
  return (
    <>
      <section className="flex flex-wrap justify-around gap-6">
        {team.map((person) => (
          <MemberCard key={person.id} person={person} />
        ))}
      </section>
    </>
  );
}

export default App;
